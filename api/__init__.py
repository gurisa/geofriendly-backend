from flask_restplus import Api
from .user import api as user

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
