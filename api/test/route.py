from flask_restplus import Namespace, Resource
from ...core.helper import db

api = Namespace('Test', description='Test operation available')

@api.route('tests/database')
class Database(Resource):
    @api.doc('Testing database')
    def get(self):
        try:
            db.session.query("1").from_statement("SELECT 1").all()
            return {'status': True, 'message': 'Database test passed', 'data': []}
        except:
            return {'status': False, 'message': 'Database test failed', 'data': []}
