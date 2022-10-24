import mysql from "mysql";

const connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "lelang",
});

connection.connect((err) => {
  if (err) console.log(err);
  console.log("connected");
});
 


export default connection;
