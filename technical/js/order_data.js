




// function get_data() {
//     let myRequest = new XMLHttpRequest();
//     myRequest.onreadystatechange = function () {
//         if (this.readyState === 4 && this.status === 200) {
//             jsData = JSON.parse(this.responseText)
//             let container = document.getElementById("data-jason");
//             let myDiv = document.createElement("div");
//             for (let i = 0; i < jsData.length; i++) {
//                 let myHeader = document.createElement("h1");
//                 let myText = document.createTextNode(jsData[i].firstName);
//                 container.append(myDiv);
//                 myDiv.append(myHeader);
//                 myHeader.appendChild(myText);
//                 console.log(jsData[i]);
//             }
//         }

//     }

//     myRequest.open('POST', 'http://localhost/My_Website_test/data_technical.php', true)
//     myRequest.send();
// }
// // send request and Get Response
// $(function () {
//     $("#data").load("choose_technical.php .card ");
// });








let technical_id = document.getElementsByClassName("add")
for (let i = 0; i < technical_id.length; i++) {
    technical_id[i].addEventListener("click", function (event) {
        let target = event.target;
        let id = target.getAttribute("data-id");
        let client_id = target.getAttribute("client_id");
        let xml = new XMLHttpRequest();
        xml.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log(this.responseText);
                let data = (JSON.parse(this.responseText));
                console.log(data.in_cart);


                let myAlert = document.querySelector('.toast');
                let bsAlert = new bootstrap.Toast(myAlert);
                bsAlert.show();

            }
        }
        xml.open("GeT", "conn.php?id=" + id + "&client_id=" + client_id, true)
        xml.send();
    });
}








