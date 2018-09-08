from flask import Flask
from flask_sqlalchemy import SQLAlchemy
from flask_restful import Resource, Api
from flask_restful.reqparse import RequestParser
from flask_jwt import JWT, jwt_required

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://root:@localhost/gurisa_geofriendly'
db = SQLAlchemy(app)
api = Api(app, prefix="/api/v0")
# jwt = JWT(app, verify, identity)
from app import routes


