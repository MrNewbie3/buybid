import fs from "fs";
import connection from "./connection.mjs";

const getDataFromDatabases = fs.writeFileSync("./buy_bid/backend/databases/text.txt", "Hello", (err) => {
  if (err) {
    console.log(err);
  } else {
    console.log("first");
  }
});
