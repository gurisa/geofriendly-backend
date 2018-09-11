from flask import Flask
from flask_restplus import Resource

from .api import api
from .core.helper import db

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://root:@localhost/gurisa_geofriendly'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = True
app.config['SQLALCHEMY_ECHO'] = True
db.init_app(app)
api.init_app(app)

if __name__ == '__main__':
    app.run(debug=True)
