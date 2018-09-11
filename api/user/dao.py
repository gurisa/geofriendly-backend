from ...core.helper import db, bcrypt
from .model import UserModel

def gets():
	return UserModel.query.all()

def get(id):
	return UserModel.query.filter_by(id=id).first()

def create(data):
	user = UserModel(data.get('username'), data.get('password'), data.get('name'))
	db.session.add(user)
	db.session.commit()
	return user

def update(id, data):
	user = UserModel.query.filter(UserModel.id == id).one()
	user.password = bcrypt.generate_password_hash(data.get('password')).decode('utf-8')
	user.name = data.get('name')
	db.session.add(user)
	db.session.commit()
	return user

def delete(id):
	user = UserModel.query.filter(UserModel.id == id).one()
	db.session.delete(user)
	db.session.commit()
