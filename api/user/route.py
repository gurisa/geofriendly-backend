from flask_restplus import Namespace, Resource, Api, fields, reqparse
from flask_jwt import JWT, jwt_required

from ...core.helper import db
from .dao import gets, get, create, update, delete

parser_insert = reqparse.RequestParser()
parser_insert.add_argument("username", type=str, required=True, help="Username has to be valid string")
parser_insert.add_argument("password", type=str, required=True, help="Password has to be valid string")
parser_insert.add_argument("name", type=str, required=True, help="Name has to be valid string")

parser_update = reqparse.RequestParser()
parser_update.add_argument("password", type=str, required=True, help="Password has to be valid string")
parser_update.add_argument("name", type=str, required=True, help="Name has to be valid string")

api = Namespace('User', description='User operation available')
fields_insert = api.model('User Insert', {
    'id': fields.Integer(readonly=True, description='identifier'),
    'username': fields.String(required=True, description='username', min_length=6, max_length=50),
    'password': fields.String(required=True, description='password', min_length=8, max_length=20),
    'name': fields.String(required=True, description='name'),
    'status': fields.Boolean(readonly=True, description='status'),
    'authority_id': fields.String(readonly=True, description='authority_id'),
    'created_at': fields.String(readonly=True, description='created_at'),
    'updated_at': fields.String(readonly=True, description='updated_at')
})

fields_update = api.model('User Update', {
    'password': fields.String(required=True, description='password', min_length=8, max_length=20),
    'name': fields.String(required=True, description='name'),
})

@api.route('users')
class UserListApi(Resource):
    @api.doc('Retrieve all users')
    @api.marshal_list_with(fields_insert, envelope='data')
    def get(self):
        try:
            data = gets()
            if data is None:
                return {'status': False, 'message': 'User data are empty', 'data': []}
            return data            
        except:
            return {'status': False, 'message': 'Failed to retrieve users', 'data': []}

    @api.doc('Create new user')
    @api.expect(fields_insert, validate=True)
    def post(self):
        # try:
            data = create(parser_insert.parse_args())
            if data is None:
                return {'status': False, 'message': 'Failed to create new user', 'data': []}, 500
            return {'status': True, 'message': 'Success to create new user', 'data': []}, 201
        # except:
            # return {'status': False, 'message': 'Failed to create new user', 'data': []}, 500

@api.param('id', 'User identifier')
@api.route('users/<int:id>')
class UserApi(Resource):
    @api.doc('Retrieve user')
    @api.marshal_with(fields_insert, envelope='data')
    def get(self, id):
        try:
            data = get(id)
            if data is None:
                return {'status': False, 'message': 'User not found', 'data': []}, 404
            return data 
        except:
            return {'status': False, 'message': 'Failed to get user', 'data': []}, 500

    @api.doc('Update user')
    @api.expect(fields_update, validate=True)
    def patch(self, id):
        # try:
            data = update(id, parser_update.parse_args())
            if data is None:
                return {'status': False, 'message': 'User not found', 'data': []}, 404
            return {'status': True, 'message': 'Success update user', 'data': []}, 200
        # except:
            # return {'status': False, 'message': 'Failed to update user', 'data': []}, 500

    @api.doc('Delete user')
    def delete(self, id):
        try:
            delete(id)
            return {'status': True, 'message': 'Success to delete user', 'data': []}, 200
        except:
            return {'status': False, 'message': 'Failed to delete user', 'data': []}, 500

# @api.respoapie(404, 'Cat not found')
# api.abort(404)