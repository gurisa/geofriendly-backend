from ...core.helper import db
from flask_bcrypt import Bcrypt

bcrypt = Bcrypt()

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