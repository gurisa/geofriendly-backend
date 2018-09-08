from sqlalchemy import Table, Column, Integer, Text
from sqlalchemy.orm import mapper
from database import metadata, db_session

class Users(object):
    query = db_session.query_property()
    def __init__(self, id=None, username=None, name=None):
        self.id = id
        self.username = username
        self.name = name

user = Table('user', metadata,
    Column('id', Integer, primary_key=True),
    Column('title', Text),
    Column('name', Text)
)

mapper(Users, user)