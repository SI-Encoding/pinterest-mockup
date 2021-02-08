### Example inspired by Tutorial at https://www.youtube.com/watch?v=MwZwr5Tvyxo&list=PL-osiE80TeTs4UjLw5MM6OjgkjFeUxCYH
### However the actual example uses sqlalchemy which uses Object Relational Mapper, which are not covered in this course. I have instead used natural sQL queries for this demo. 

from flask import Flask, render_template, url_for
app = Flask(__name__)

#this is where the data for the posts are stored.
posts = [
  {
      'username': 'James',
      'title': 'How to Build a Data Science Portfolio',
      'content': 'The best way to build a data science portfolio is to do a project.',
  },
  {
      'username': 'Jane',
      'title': 'Blockchain Could Unlock Vital Funding to Tackle Climate Change',
      'content': 'Billions of dollars in promised funding is failing to reach the world’s poorest countries — but technologists have a fix in mind .....',
  }, 
    {
    'username': 'Jack',
    'title': 'Can Data Save the Great Barrier Reef?',
    'content': 'Marine scientists are using technology to track the overall health of the reef.'
    }
]


#try adding the following code above and refresing your browser (be sure to check your formatting)
"""
, 
{
  'username': 'Jack',
  'title': 'Can Data Save the Great Barrier Reef?',
  'content': 'Marine scientists are using technology to track the overall health of the reef.'
}
  
"""

#routing code (displays each page)
@app.route("/")
@app.route("/home")
def home():
    return render_template('home.html', posts=posts)


@app.route("/register", methods=['GET', 'POST'])
def register():
    return render_template('register.html', title='Register')


@app.route("/blog", methods=['GET', 'POST'])
def blog():
    return render_template('blog.html', title='Blog')

if __name__ == '__main__':
    app.run(debug=True)

