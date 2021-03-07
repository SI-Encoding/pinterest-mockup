### Example inspired by Tutorial at https://www.youtube.com/watch?v=MwZwr5Tvyxo&list=PL-osiE80TeTs4UjLw5MM6OjgkjFeUxCYH
### However the actual example uses sqlalchemy which uses Object Relational Mapper, which are not covered in this course. I have instead used natural sQL queries for this demo. 

from flask import Flask, render_template, url_for, flash, redirect, request
from forms import RegistrationForm, BlogForm, LoginForm, UpdateAccountForm
from werkzeug.utils import secure_filename
from flask_wtf.file import FileField, FileAllowed
from flask_uploads import IMAGES, UploadSet, configure_uploads, patch_request_class
import os
import secrets
from flask_login import current_user, login_user, login_required
from werkzeug.datastructures import CombinedMultiDict
import sqlite3

conn = sqlite3.connect('blog.db')
app = Flask(__name__)
app.config['SECRET_KEY'] = 'eca8a83f56f05a17a27d8076f0904b1f'
#photo stuff
app.config['UPLOADED_PHOTOS_DEST'] = os.getcwd()

photos = UploadSet('photos', IMAGES)
configure_uploads(app, photos)
patch_request_class(app)  # set maximum file size, default is 16MB

#Turn the results from the database into a dictionary
def dict_factory(cursor, row):
    d = {}
    for idx, col in enumerate(cursor.description):
        d[col[0]] = row[idx]
    return d
    
def allowed_file(filename):
	return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

posts = [
    {
        'username': 'James',
        'title': 'How to Build a Data Science Portfolio',
        'content': 'The best way to build a data science portfolio is to do a project',
    },
    {
        'username': 'Jane',
        'title': 'Blockchain Could Unlock Vital Funding to Tackle Climate Chang',
        'content': 'Billions of dollars in promised funding is failing to reach the world’s poorest countries — but technologists have a fix in mind .....',
    }
]
users = [(0, 'James'), (1, 'Jane')]

categories= [(0, 'Bedroom'), (1, 'Washroom'), (2, 'Kitchen'), (3, 'Dining Room'), (4,'Garage') ,(5, 'Living Room'), (6, 'Recreational'), (7,'Laundry')]

#Main Page
@app.route("/")
@app.route("/home")
def home():
    conn = sqlite3.connect('blog.db')

    #Display all blogs from the 'blogs' table
    conn.row_factory = dict_factory
    c = conn.cursor()
    c.execute("SELECT * FROM blogs")
    posts = c.fetchall()
    return render_template('home.html', posts=posts)

#Add Image
@app.route("/upload")
def upload():
    return render_template('upload.html', posts=posts)


#Add User
@app.route("/register", methods=['GET', 'POST'])
def register():
    form = RegistrationForm()
    if form.validate_on_submit():
        conn = sqlite3.connect('blog.db')
        c = conn.cursor()
        
        #Add the new blog into the 'blogs' table
        query = 'insert into users VALUES (?, ?, ?)'
        c.execute(query, (form.username.data, form.email.data, form.password.data)) #Execute the query
        conn.commit() #Commit the changes

        users.append((len(users), form.username.data))
        flash(f'Account created for {form.username.data}!', 'success')
        return redirect(url_for('home'))
    return render_template('register.html', title='Register', form=form)


#Sign In
@app.route("/login", methods=['GET', 'POST'])
def login():
    form = LoginForm()
    if form.validate_on_submit():
        if form.email.data == 'admin@blog.com' and form.password.data == 'password':
            flash('You have logged in','success')
            return redirect(url_for('home'))
        else:
            flash('Login unsuccessful. Please check email address and password', 'danger') 
    return render_template('login.html', title='Login', form=form)


 #Logging out
@app.route("/logout", methods=['GET', 'POST'])
def logout():
    #logout_user()
    return redirect(url_for('home'))
        

#Add Post
@app.route("/post", methods=['GET', 'POST'])
def post():
    return render_template('post.html', title='Post', posts=posts)   

#Add Blog
@app.route("/blog", methods=['GET', 'POST'])
def blog():
 
    conn = sqlite3.connect('blog.db')

    #Display all usernames stored in 'users' in the Username field
    conn.row_factory = lambda cursor, row: row[0]
    c = conn.cursor()
    c.execute("SELECT username FROM users")
    results = c.fetchall()
    users = [(results.index(item), item) for item in results]
    #Blog
    form = BlogForm()
    form.username.choices = users
    form.category.choices = categories
    if form.validate_on_submit():
       # f = form.photo.data
      #  filename = secure_filename(f.filename)
      #  f.save(os.path.join(
       #     app.instance_path, 'static/uploaded_pics', filename
      #  ))
        #filename = photos.save(form.photo.data)
        #file_url = photos.url(filename)
        choices = form.username.choices
        choices2 = form.category.choices
        user =  (choices[form.username.data][1])
        category =  (choices2[form.category.data][1])
        title = form.title.data
        content = form.content.data
   
        posts.insert(0, {
            'username': user,
            'title': title,
            'content': content,
            'category': category
        })
        #Add the new blog into the 'blogs' table in the database
        query = 'insert into blogs (username, title, content) VALUES (?, ?, ?)' #Build the query
        c.execute(query, (user, title, content)) #Execute the query
        conn.commit() #Commit the changes
        return redirect(url_for('home'))
    else:
        file_url = None    
    return render_template('blog.html', title='Blog', form=form, file_url=file_url)

#Save user post
def save_post_pic(form_picture):
    random_hex = secrets.token_hex(8)
    _, f_ext = os.path.splitext(form_picture.filename)
    picture_fn = random_hex + f_ext
    picture_path = os.path.join(app.root_path, 'static/uploaded_pics', picture_fn)
    form_picture.save(picture_path)

    return picture_fn

#Save user profilepic
def save_profile_pic(form_picture):
    random_hex = secrets.token_hex(8)
    _, f_ext = os.path.splitext(form_picture.filename)
    picture_fn = random_hex + f_ext
    picture_path = os.path.join(app.root_path, 'static/profile_pics', picture_fn)
    form_picture.save(picture_path)

    return picture_fn

#User Account
@app.route('/account', methods=['GET','POST'])
@login_required
def account():
    form = UpdateAccountForm()
    if form.validate_on_submit():
        if form.photo.data:
            picture_file = save_profile_pic(form.picture.data)
            current_user.image_file = picture_file    
        current_user.username = form.username.data
        current_user.email = form.email.data
        #db.session.commit()
        flash('your account has been updated', 'success')
        return redirect(url_for('account'))
    elif request.method == 'GET':
        form.username.data =current_user.username
        form.email.data =current_user.email
    image_file = url_for('static', filename='profile_pics/' + current_user.image_file)
    return render_template('account.html', title='Account', image_file = image_file, form=form)    

if __name__ == '__main__':
    app.run(debug=True)

