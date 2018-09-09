from app import app

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
parser = RequestParser(bundle_errors=True)
parser.add_argument("username", type=str, required=True, help="Username has to be valid string")
parser.add_argument("password", type=str, required=True, help="Password has to be valid string")
parser.add_argument("name", type=str, required=True, help="Name has to be valid string")
## end of declare ##

## begin of class ##
class UserCollection(Resource):
    def get(self):
        return {"status": True, "code": 200, "message": "User retrieved", "data": users}, 200

    def post(self):
        args = parser.parse_args()
        users.append(args)
        return {"status": True, "code": 201, "message": "User added", "data": {"user": args}}, 201

class User(Resource):
    id = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(80), unique=True)
    password = db.Column(db.String(120), unique=True)

    def __init__(self, username, password):
        self.username = username
        self.password = password

    def __repr__(self):
        return '<User %r>' % self.username

    def get(self, id):
        user = getUser(id)
        if not user:
            return {"status": False, "code": 404, "message": "User not found", "data": {}}, 404
        return {"status": True, "code": 200, "message": "User retrieved", "data": {"user": user}}, 200

    def put(self, id):
        args = parser.parse_args()
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