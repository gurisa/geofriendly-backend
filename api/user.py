from flask_restplus import Namespace, Resource, Api, fields, reqparse
from flask_bcrypt import Bcrypt
from flask_jwt import JWT, jwt_required

from ..core.helper import db

bcrypt = Bcrypt()
parser = reqparse.RequestParser()
parser.add_argument("username", type=str, required=True, help="Username has to be valid string")
parser.add_argument("password", type=str, required=True, help="Password has to be valid string")
parser.add_argument("name", type=str, required=True, help="Name has to be valid string")

api = Namespace('users', description='User operation available')
fields = api.model('User', {
    'id': fields.Integer(readonly=True, description='identifier'),
    'username': fields.String(required=True, description='username'),
    'password': fields.String(required=True, description='password'),
    'name': fields.String(required=True, description='name'),
    'status': fields.Boolean(readonly=True, description='status'),
    'authority_id': fields.String(readonly=True, description='authority_id'),
    'created_at': fields.String(readonly=True, description='created_at'),
    'updated_at': fields.String(readonly=True, description='updated_at')
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

@api.route('users')
class UserListApi(Resource):
    @api.doc('Retrieving all users')
    @api.marshal_list_with(fields, envelope='data')
    def get(self, **kwargs):
        try:
            return UserModel.query.all()
        except:
            return {'status': False, 'message': 'Failed to retrieve users', 'data': []}

    @api.doc('Create new user')
    @api.expect(fields)
    @api.marshal_with(fields, code=201, envelope='data')
    def post(self):
        try:
            data = request.json
            username = data.get('username')
            password = data.get('password')
            name = data.get('name')
            user = UserModel(username, password, name)
            db.session.add(user)
            db.session.commit()
            return user, 201
        except:
            return {'status': False, 'message': 'Failed to create new user', 'data': []}

# @api.param('id', 'User identifier')
# @api.respoapie(404, 'Cat not found')
# api.abort(404)
@api.route('user')
class UserApi(Resource):
    def get(self, id):
        return {'hello': 'world'}

    def patch(self, id):
        return {'hello': 'world'}

    def delete(self, id):
        return {'hello': 'world'}        