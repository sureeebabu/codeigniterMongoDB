echo "# codeigniterMongoDB" >> README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin https://github.com/sureeebabu/codeigniterMongoDB.git
git push -u origin master

4.show dbs;
5.use testDB;
6.  db; --> display current database
6.1 drop database --> db.dropDatabase()

important Step : db.createUser(
  {
    user: "testDB",
    pwd: "testDB",
    roles: [ { role: "readWrite", db: "testDB" } ]
  }
)

7.db.createCollection("newsMaster")
8.db.newsMaster.insert({
	newsTitle :'Some Title',
	newsDesc:'Some desc', 
	newsCategory:'UK'
	});

	 db.newsMaster.insertMany([
		{
		 newsTitle :'Some Title',
		 newsDesc:'Some desc', 
		 newsCategory:'UK'
		},
		{
		 newsTitle :'Some Title 2',
		 newsDesc:'Some desc 2', 
		 newsCategory:'UK'
		}
		  ]);

9.show collections;
10.db.newsMaster.find();
11.db.newsMaster.find().pretty();
12.db.newsMaster.drop();

13.db.newsMaster.deleteOne( { "_id" : ObjectId("563237a41a4d68582c2509da") } );
   db.newsMaster.deleteMany( { "newsCategory" : "uk"} );
   db.newsMaster.deleteMany({});  ==>delete all documents

14.db.newsMaster.updateOne(
      {
	"_id" : ObjectId("5d075c06b298c7ebffe3088c")

      },
      { 
	$set: 
	   {
 	   "newsTitle" : "suresh babu",
	   "newsDesc" : "suresh Desc"
	 }
      }
   );
--------------------------------
db.newsMaster.updateOne(
      {
	"_id" : ObjectId("5d075c06b298c7ebffe3088c")

      },
      { 
	$set: 
	   {
 	   "newsTitle" : "suresh babu",
	   "newsDesc" : "suresh Desc",
	   "newsField" :"yes, New Field Added"
	 }
      }
   );
----------------------------------
db.newsMaster.updateMany(
      {
	"newsCategory" : "uk"

      },
      { 
	$set: 
	   {
 	   "newsTitle" : "suresh babu",
	   "newsDesc" : "suresh Desc",
	   "newsField" :"yes, New Field Added"
	 }
      }
   );
----------------------------------
