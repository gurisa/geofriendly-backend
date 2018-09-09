from flask import Flask
from flask_sqlalchemy import SQLAlchemy
from flask_restplus import Resource, Api
# from flask_jwt import JWT, jwt_required
# from api.user import user
# from model import Users

app = Flask(__name__)
api = Api(app, version='0.1', title='GeoFriendly', description='Visit for more: <a href="https://www.gurisa.com" target="_blank">Gurisa Devs</a>')

@api.route('/users')
class Users(Resource):
    def get(self):
        return {'hello': 'world'}

@api.route('/class')
class Class(Resource):
    def get(self):
        return {'hello': 'world'}

@api.route('/families')
class Families(Resource):
    def get(self):
        return {'hello': 'world'}

@api.route('/ages')
class Ages(Resource):
    def get(self):
        return {'hello': 'world'}

@api.route('/acquisitions')
class Acquisitions(Resource):
    def get(self):
        return {'hello': 'world'}

@api.route('/specimens')
class Specimens(Resource):
    def get(self):
        return {'hello': 'world'}

@api.route('/maps')
class Maps(Resource):
    def get(self):
        return {'hello': 'world'}

@api.route('/collections')
class Collections(Resource):
    def get(self):
        return {'hello': 'world'}

@api.route('/acquisitions')
class Acquisitions(Resource):
    def get(self):
        return {'hello': 'world'}

@api.route('/scales')
class Scales(Resource):
    def get(self):
        return {'hello': 'world'}

@api.route('/islands')
class Islands(Resource):
    def get(self):
        return {'hello': 'world'}

@api.route('/racks')
class Racks(Resource):
    def get(self):
        return {'hello': 'world'}

@api.route('/drawers')
class Drawers(Resource):
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