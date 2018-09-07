## begin of init ##
from flask import Flask
from flask_restful import Resource, Api
from flask_restful.reqparse import RequestParser
from flask_jwt import JWT, jwt_required

app = Flask(__name__)
api = Api(app, prefix="/api/v0")

# jwt = JWT(app, verify, identity)
## end of init ##

## begin of variable ##
users = []
## end of variable ##

## begin of method ##
def getUser(user_id):
    for x in users:
        if x.get("id") == int(user_id):
            return x
## end of method ##

## begin of declare ##
user_request_parser = RequestParser(bundle_errors=True)
user_request_parser.add_argument("username", type=str, required=True, help="Username has to be valid string")
user_request_parser.add_argument("password", type=str, required=True, help="Password has to be valid string")
user_request_parser.add_argument("name", type=str, required=True, help="Name has to be valid string")
## end of declare ##

## begin of class ##
class UserCollection(Resource):
    def get(self):
        return {"status": True, "code": 200, "message": "User retrieved", "data": users}, 200

    def post(self):
        args = user_request_parser.parse_args()
        users.append(args)
        return {"status": True, "code": 201, "message": "User added", "data": {"user": args}}, 201

class User(Resource):
    def get(self, id):
        user = getUser(id)
        if not user:
            return {"status": False, "code": 404, "message": "User not found", "data": {}}, 404
        return {"status": True, "code": 200, "message": "User retrieved", "data": {"user": user}}, 200

    def put(self, id):
        args = user_request_parser.parse_args()
        user = getUser(id)
        if user:
            users.remove(user)
            users.append(args)
            return {"status": True, "code": 200, "message": "User updated", "data": {"user": args}}, 200
        return {"status": False, "code": 404, "message": "User not found", "data": {}}, 404    

    def delete(self, id):
        user = getUser(id)
        if user:
            users.remove(user)
            return {"status": True, "code": 200, "message": "User deleted", "data": {}}, 200
        return {"status": False, "code": 404, "message": "User not found", "data": {}}, 404    
## end of class ##

## begin of main ##
api.add_resource(UserCollection, '/users')
api.add_resource(User, '/users/<int:id>')

if __name__ == '__main__':
    app.run(debug=True)
## end of main ##