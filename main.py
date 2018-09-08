from flask import Flask
from flask_restplus import Resource, Api
# from database import db_session
from model import Users

app = Flask(__name__)
api = Api(app, version='0.1', title='GeoFriendly', description='geofriendly.gurisa.com')

@api.route('/users')
class Users(Resource):
    model = api.model('Model', {
        'id': fields.Integer,
        'title': fields.String,
        'post': fields.String,
    })
    @api.marshal_with(model, envelope='resource')
    def get(self, **kwargs):
        return Users.query.all()

@app.teardown_appcontext
def shutdown_session(exception=None):
    db_session.remove()


if __name__ == '__main__':
    app.run(debug=True)