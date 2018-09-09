from flask import Flask
from flask_sqlalchemy import SQLAlchemy
from flask_restplus import Resource, Api
# from flask_jwt import JWT, jwt_required
# from api.user import user
# from model import Users

app = Flask(__name__)
api = Api(app, version='0.1', doc='/doc/', default ='Endpoint', default_label='List of api endpoint', title='GeoFriendly', description='More stuffs: <a href="https://www.gurisa.com" target="_blank">Gurisa Devs</a>')

class UserListApi(Resource):
    def get(self):
        return {'hello': 'world'}

    def post(self):
        return {'hello': 'world'}

class UserApi(Resource):
    def get(self, id):
        return {'hello': 'world'}

    def put(self, id):
        return {'hello': 'world'}

    def delete(self, id):
        return {'hello': 'world'}

class ClassListApi(Resource):
    def get(self):
        return {'hello': 'world'}

    def post(self):
        return {'hello': 'world'}

class ClassApi(Resource):
    def get(self, id):
        return {'hello': 'world'}

    def put(self, id):
        return {'hello': 'world'}

    def delete(self, id):
        return {'hello': 'world'}

class FamilyListApi(Resource):
    def get(self):
        return {'hello': 'world'}

    def post(self):
        return {'hello': 'world'}

class FamilyApi(Resource):
    def get(self, id):
        return {'hello': 'world'}

    def put(self, id):
        return {'hello': 'world'}

    def delete(self, id):
        return {'hello': 'world'}

class AgeListApi(Resource):
    def get(self):
        return {'hello': 'world'}

    def post(self):
        return {'hello': 'world'}

class AgeApi(Resource):
    def get(self, id):
        return {'hello': 'world'}

    def put(self, id):
        return {'hello': 'world'}

    def delete(self, id):
        return {'hello': 'world'}

class AcquisitionListApi(Resource):
    def get(self):
        return {'hello': 'world'}

    def post(self):
        return {'hello': 'world'}

class AcquisitionApi(Resource):
    def get(self, id):
        return {'hello': 'world'}

    def put(self, id):
        return {'hello': 'world'}

    def delete(self, id):
        return {'hello': 'world'}

class SpecimenListApi(Resource):
    def get(self):
        return {'hello': 'world'}

    def post(self):
        return {'hello': 'world'}

class SpecimenApi(Resource):
    def get(self, id):
        return {'hello': 'world'}

    def put(self, id):
        return {'hello': 'world'}

    def delete(self, id):
        return {'hello': 'world'}

class MapListApi(Resource):
    def get(self):
        return {'hello': 'world'}

    def post(self):
        return {'hello': 'world'}

class MapApi(Resource):
    def get(self, id):
        return {'hello': 'world'}

    def put(self, id):
        return {'hello': 'world'}

    def delete(self, id):
        return {'hello': 'world'}

class CollectionListApi(Resource):
    def get(self):
        return {'hello': 'world'}

    def post(self):
        return {'hello': 'world'}

class CollectionApi(Resource):
    def get(self, id):
        return {'hello': 'world'}

    def put(self, id):
        return {'hello': 'world'}

    def delete(self, id):
        return {'hello': 'world'}

class ScaleListApi(Resource):
    def get(self):
        return {'hello': 'world'}

    def post(self):
        return {'hello': 'world'}

class ScaleApi(Resource):
    def get(self, id):
        return {'hello': 'world'}

    def put(self, id):
        return {'hello': 'world'}

    def delete(self, id):
        return {'hello': 'world'}

class IslandListApi(Resource):
    def get(self):
        return {'hello': 'world'}

    def post(self):
        return {'hello': 'world'}

class IslandApi(Resource):
    def get(self, id):
        return {'hello': 'world'}

    def put(self, id):
        return {'hello': 'world'}

    def delete(self, id):
        return {'hello': 'world'}

class RackListApi(Resource):
    def get(self):
        return {'hello': 'world'}

    def post(self):
        return {'hello': 'world'}

class RackApi(Resource):
    def get(self, id):
        return {'hello': 'world'}

    def put(self, id):
        return {'hello': 'world'}

    def delete(self, id):
        return {'hello': 'world'}

class DrawerListApi(Resource):
    def get(self):
        return {'hello': 'world'}

    def post(self):
        return {'hello': 'world'}

class DrawerApi(Resource):
    def get(self, id):
        return {'hello': 'world'}

    def put(self, id):
        return {'hello': 'world'}

    def delete(self, id):
        return {'hello': 'world'}

api.add_resource(UserListApi, '/api/v0/users', endpoint = 'users')
api.add_resource(UserApi, '/api/v0/user/<int:id>', endpoint = 'user')

api.add_resource(ClassListApi, '/api/v0/classes', endpoint = 'classes')
api.add_resource(ClassApi, '/api/v0/class/<int:id>', endpoint = 'class')

api.add_resource(FamilyListApi, '/api/v0/families', endpoint = 'families')
api.add_resource(FamilyApi, '/api/v0/family/<int:id>', endpoint = 'family')

api.add_resource(AgeListApi, '/api/v0/ages', endpoint = 'ages')
api.add_resource(AgeApi, '/api/v0/age/<int:id>', endpoint = 'age')

api.add_resource(AcquisitionListApi, '/api/v0/acquisitions', endpoint = 'acquisitions')
api.add_resource(AcquisitionApi, '/api/v0/acquisition/<int:id>', endpoint = 'acquisition')

api.add_resource(SpecimenListApi, '/api/v0/specimens', endpoint = 'specimens')
api.add_resource(SpecimenApi, '/api/v0/specimen/<int:id>', endpoint = 'specimen')

api.add_resource(MapListApi, '/api/v0/maps', endpoint = 'maps')
api.add_resource(MapApi, '/api/v0/map/<int:id>', endpoint = 'map')

api.add_resource(CollectionListApi, '/api/v0/collections', endpoint = 'collections')
api.add_resource(CollectionApi, '/api/v0/collection/<int:id>', endpoint = 'collection')

api.add_resource(ScaleListApi, '/api/v0/scales', endpoint = 'scales')
api.add_resource(ScaleApi, '/api/v0/scale/<int:id>', endpoint = 'scale')

api.add_resource(IslandListApi, '/api/v0/islands', endpoint = 'islands')
api.add_resource(IslandApi, '/api/v0/island/<int:id>', endpoint = 'island')

api.add_resource(RackListApi, '/api/v0/racks', endpoint = 'racks')
api.add_resource(RackApi, '/api/v0/rack/<int:id>', endpoint = 'rack')

api.add_resource(DrawerListApi, '/api/v0/drawers', endpoint = 'drawers')
api.add_resource(DrawerApi, '/api/v0/drawer/<int:id>', endpoint = 'drawer')

if __name__ == '__main__':
    app.run(debug=True)