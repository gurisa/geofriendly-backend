# from datetime import datetime

from flask import Flask, request
from flask_sqlalchemy import SQLAlchemy
from flask_restplus import Namespace, Resource, Api, fields, reqparse
from flask_bcrypt import Bcrypt
# from flask_jwt import JWT, jwt_required
# from api.user import user

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://root:@localhost/gurisa_geofriendly'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = True
app.config['SQLALCHEMY_ECHO'] = True
db = SQLAlchemy(app)
bcrypt = Bcrypt(app)

api = Api(app, 
    version='1', 
    doc='/doc/', 
    default ='Other', 
    default_label='Other', 
    title='GeoFriendly', 
    url='https://geofriendly.gurisa.com',
    author='Raka Suryaardi Widjaja',
    description='More stuffs: <a href="https://www.gurisa.com" target="_blank">Gurisa Devs</a>',
)

parser = reqparse.RequestParser()
parser.add_argument("username", type=str, required=True, help="Username has to be valid string")
parser.add_argument("password", type=str, required=True, help="Password has to be valid string")
parser.add_argument("name", type=str, required=True, help="Name has to be valid string")

class RemoveField(fields.Raw):
    def format(self, value):
        return None

test_ns = api.namespace('test', description='Test operation available')
@test_ns.route('/database')
class Database(Resource):
    @test_ns.doc('Testing database')
    def get(self):
        try:
            db.session.query("1").from_statement("SELECT 1").all()
            return {'status': True, 'message': 'Database test passed', 'data': []}
        except:
            return {'status': False, 'message': 'Database test failed', 'data': []}

user_ns = api.namespace('users', description='User operation available')
user_field = api.model('User', {
    'id': fields.Integer(readonly=True, description='identifier'),
    'username': fields.String(required=True, description='username'),
    'password': RemoveField(attribute='password', required=True, description='password'),
    'name': fields.String(required=True, description='name'),
    'status': fields.Boolean(readonly=True, description='status'),
    'authority_id': fields.String(readonly=True, description='authority_id')
})

class UserModel(db.Model):
    __tablename__ = "user"
    id = db.Column('id', db.Integer, primary_key=True)
    username = db.Column('username', db.String(50), unique=True, nullable=False)
    password = db.Column('password', db.String(255), nullable=False)
    name = db.Column('name', db.String(50), nullable=False)
    status = db.Column('status', db.Integer, nullable=False)
    authority_id = db.Column('authority_id', db.Integer, nullable=False)
    created_at = db.Column('created_at', db.String(50))
    updated_at = db.Column('updated_at', db.String(50))

    def __init__(self, username, password, name):
        self.username = username
        self.password = bcrypt.generate_password_hash(password).decode('utf-8')
        self.name = name
        self.status = 0
        self.authority_id = 1

    def __repr__(self):
        return '<User %r>' % self.username

@user_ns.route('')
class UserListApi(Resource):
    @user_ns.doc('Retrieving all users')
    @user_ns.marshal_list_with(user_field, envelope='data')
    def get(self, **kwargs):
        try:
            return UserModel.query.all()
        except:
            return {'status': False, 'message': 'Failed to retrieve users', 'data': []}

    @user_ns.doc('Create new user')
    @user_ns.expect(user_field)
    @user_ns.marshal_with(user_field, code=201, envelope='data')
    def post(self):
        data = request.json
        username = data.get('username')
        password = data.get('password')
        name = data.get('name')
        user = UserModel(username, password, name)
        db.session.add(user)
        db.session.commit()
        return user, 201

class UserApi(Resource):
    def get(self, id):
        return {'hello': 'world'}

    def put(self, id):
        return {'hello': 'world'}

    def delete(self, id):
        return {'hello': 'world'}

if __name__ == '__main__':
    app.run(debug=True)