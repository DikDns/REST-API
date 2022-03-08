//! DECODE
const STUDENT = {
    name: "DikDns",
    isn: "0020111",
    email: "dikdnssocial@gmail.com"
}

console.log(JSON.stringify(STUDENT));

let data;

fetch("data.json",{
    method: "GET",
})
.then(response => response.json())
.then(response => console.log(response));