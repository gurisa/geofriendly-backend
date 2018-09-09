from flask import Flask
from flask_restplus import Resource, Api
from database import db_session
from flask_sqlalchemy import SQLAlchemy
from flask_jwt import JWT, jwt_required
# from model import Users

app = Flask(__name__)
api = Api(app, version='0.1', title='GeoFriendly', description='Visit for more: <a href="https://www.gurisa.com" target="_blank">Gurisa Devs</a>')

@api.route('/users')
class Users(Resource):
    def get(self):
        return {'hello': 'world'}
        
@api.route('/user')
class Users(Resource):
    def get(self):
        return {'hello': 'world'}

#     model = api.model('Model', {
#         'id': id.Integer,
#         'username': username.String,
#         'name': name.String,
#     })
    
# @api.marshal_with(model, envelope='resource')
# def get(self, **kwargs):
#     return Users.query.all()

# @app.teardown_appcontext
# def shutdown_session(exception=None):
    # db_session.remove()


    if __name__ == '__main__':
        app.run(debug=True)