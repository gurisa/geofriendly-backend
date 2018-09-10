from flask_restplus import Api
from .user.route import api as user
from .test.route import api as database

api = Api(
    version='1', 
    doc='/doc/', 
    default ='Other', 
    default_label='Other', 
    title='GeoFriendly', 
    url='https://geofriendly.gurisa.com',
    author='Raka Suryaardi Widjaja',
    description='More stuffs: <a href="https://www.gurisa.com" target="_blank">Gurisa Devs</a>',
)

api.add_namespace(user, path='/api/v1/')
api.add_namespace(database, path='/api/v1/')
