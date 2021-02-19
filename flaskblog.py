### Example inspired by Tutorial at https://www.youtube.com/watch?v=MwZwr5Tvyxo&list=PL-osiE80TeTs4UjLw5MM6OjgkjFeUxCYH
### However the actual example uses sqlalchemy which uses Object Relational Mapper, which are not covered in this course. I have instead used natural sQL queries for this demo. 

from flask import Flask, render_template, url_for, flash, redirect, request
from forms import RegistrationForm, BlogForm, LoginForm, UpdateAccountForm
from werkzeug.utils import secure_filename
from flask_wtf.file import FileField, FileAllowed
from flask_uploads import IMAGES, UploadSet, configure_uploads
import os
import secrets

app = Flask(__name__)
app.config['SECRET_KEY'] = 'eca8a83f56f05a17a27d8076f0904b1f'

photos = UploadSet("photos", IMAGES)
app.config["UPLOADED_PHOTOS_DEST"] = "static/uploaded_pics"
configure_uploads(app, photos)

#May delete
UPLOAD_FOLDER = 'static/uploaded_pics'
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

ALLOWED_EXTENSIONS = set(['png', 'jpg', 'jpeg', 'gif'])
app.config['MAX_CONTENT_LENGTH'] = 16 * 1024 * 1024


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

#Main Page
@app.route("/")
@app.route("/home")
def home():
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

#Add Blog
@app.route("/blog", methods=['GET', 'POST'])
def blog():
 
    #Blog
    form = BlogForm()
    form.username.choices = users
    if form.validate_on_submit():
        choices = form.username.choices
        user =  (choices[form.username.data][1])
        title = form.title.data
        content = form.content.data
        #image
       # photos.save(request.files['photo'])
#'photos' : photos
        f = form.photos.data
        filename = secure_filename(f.filename)
        f.save('/static/uploaded_pics' + filename)
        
        posts.insert(0, {
            'username': user,
            'title': title,
            'content': content,
            'photos': f
        })
        
        flash(f'Blog created for {user}!', 'success')
        return redirect(url_for('home'))
    return render_template('blog.html', title='Blog', form=form)

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
def account():
    form = UpdateAccountForm()
    if form.validate_on_submit():
        if form.photo.data:
            picture_file = save_profile_pic(form.picture.data)
            current_user.image_file = picture_file    
        current_user.username = form.username.data
        current_user.email = form.email.data
        db.session.commit()
        flash('your account has been updated', 'success')
        return redirect(url_for('account'))
    elif request.method == 'GET':
        form.username.data =current_user.username
        form.email.data =current_user.email
    image_file = url_for('static', filename='profile_pics/' + current_user.image_file)
    return render_template('account.html', title='Account', image_file = image_file, form=form)    

if __name__ == '__main__':
    app.run(debug=True)

