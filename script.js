//variabel dari input sebelum tambah data
function validateForm() {
  var id = document.getElementById("id").value;
  var name = document.getElementById("name").value;
  var alamat = document.getElementById("alamat").value;
  var penyakit = document.getElementById("penyakit").value;
  var noruang = document.getElementById("noruang").value;
  var bpjs = document.getElementById("bpjs").value;
  var tglmasuk = document.getElementById("tglmasuk").value;
  var tglkeluar = document.getElementById("tglkeluar").value;

  if (id == "") {
    alert("Masukkan ID");
    return false;
  }

  if (name == "") {
    alert("Masukkan Nama");
    return false;
  }

  if (alamat == "") {
    alert("Masukkan Alamat");
    return false;
  }

  if (penyakit == "") {
    alert("Masukkan Penyakit");
    return false;
  }

  if (noruang <= 0) {
    alert("Masukkan Nomor Ruang dengan benar");
    return false;
  }

  if (bpjs == "") {
    alert("Masukkan BPJS");
    return false;
  }

  //   if (tglmasuk == "") {
  //     alert("Masukkan BPJS");
  //     return false;
  //   }

  //   if (tglkeluar == "") {
  //     alert("Masukkan BPJS");
  //     return false;
  //   }

  return true;
}

//fungsi untuk menampilkan data
function showData() {
  var peopleList;
  if (localStorage.getItem("peopleList") == null) {
    peopleList = [];
  } else {
    peopleList = JSON.parse(localStorage.getItem("peopleList"));
  }

  var html = "";

  peopleList.forEach(function (element, index) {
    html += "<tr>";
    html += "<td class='mobile'>" + element.id + "</td>";
    html += "<td class='mobile'>" + element.name + "</td>";
    html += "<td class='tablet'>" + element.alamat + "</td>";
    html += "<td class='mobile'>" + element.penyakit + "</td>";
    html += "<td class='tablet'>" + element.noruang + "</td>";
    html += "<td class='dekstop'>" + element.bpjs + "</td>";
    html += "<td class='dekstop'>" + element.tglmasuk + "</td>";
    html += "<td class='dekstop'>" + element.tglkeluar + "</td>";
    html +=
      '<td><button onclick="deleteData(' +
      index +
      ')" class="btn">Delete</button><button onclick="updateData(' +
      index +
      ')" class="btn">Edit</button></td>';

    html += "</tr>";
  });

  document.querySelector("#crud-table tbody").innerHTML = html;
}

//Load semua data saat halaman load
document.onload = showData();

//fungsi menambahkan data
function saveData() {
  if (validateForm() == true) {
    var id = document.getElementById("id").value;
    var name = document.getElementById("name").value;
    var alamat = document.getElementById("alamat").value;
    var penyakit = document.getElementById("penyakit").value;
    var noruang = document.getElementById("noruang").value;
    var bpjs = document.getElementById("bpjs").value;
    var tglmasuk = document.getElementById("tglmasuk").value;
    var tglkeluar = document.getElementById("tglkeluar").value;

    var peopleList;
    if (localStorage.getItem("peopleList") == null) {
      peopleList = [];
    } else {
      peopleList = JSON.parse(localStorage.getItem("peopleList"));
    }

    peopleList.push({
      id: id,
      name: name,
      alamat: alamat,
      penyakit: penyakit,
      noruang: noruang,
      bpjs: bpjs,
      tglmasuk: tglmasuk,
      tglkeluar: tglkeluar,
    });
    localStorage.setItem("peopleList", JSON.stringify(peopleList));
    showData();
    document.getElementById("id").value = "";
    document.getElementById("name").value = "";
    document.getElementById("alamat").value = "";
    document.getElementById("penyakit").value = "";
    document.getElementById("noruang").value = "";
    document.getElementById("bpjs").value = "";
    document.getElementById("tglmasuk").value = "";
    document.getElementById("tglkeluar").value = "";
  }
}

//fungsi menghapus dan edit data
function deleteData(index) {
  if (localStorage.getItem("peopleList") == null) {
    peopleList = [];
  } else {
    peopleList = JSON.parse(localStorage.getItem("peopleList"));
  }

  peopleList.splice(index, 1);
  localStorage.setItem("peopleList", JSON.stringify(peopleList));
  showData();
}

// fungsi untuk edit data
function updateData(index) {
  document.getElementById("save").style.display = "none";
  document.getElementById("update").style.display = "block";
  var peopleList;
  if (localStorage.getItem("peopleList") == null) {
    peopleList = [];
  } else {
    peopleList = JSON.parse(localStorage.getItem("peopleList"));
  }

  document.getElementById("id").value = peopleList[index].id;
  document.getElementById("name").value = peopleList[index].name;
  document.getElementById("alamat").value = peopleList[index].alamat;
  document.getElementById("penyakit").value = peopleList[index].penyakit;
  document.getElementById("noruang").value = peopleList[index].noruang;
  document.getElementById("bpjs").value = peopleList[index].bpjs;
  document.getElementById("tglmasuk").value = peopleList[index].tglmasuk;
  document.getElementById("tglkeluar").value = peopleList[index].tglkeluar;

  document.querySelector("#update").onclick = function () {
    if (validateForm() == true) {
      peopleList[index].id = document.getElementById("id").value;
      peopleList[index].name = document.getElementById("name").value;
      peopleList[index].alamat = document.getElementById("alamat").value;
      peopleList[index].penyakit = document.getElementById("penyakit").value;
      peopleList[index].noruang = document.getElementById("noruang").value;
      peopleList[index].bpjs = document.getElementById("bpjs").value;
      peopleList[index].tglmasuk = document.getElementById("tglmasuk").value;
      peopleList[index].tglkeluar = document.getElementById("tglkeluar").value;

      localStorage.setItem("peopleList", JSON.stringify(peopleList));

      showData();
      document.getElementById("id").value = "";
      document.getElementById("name").value = "";
      document.getElementById("alamat").value = "";
      document.getElementById("penyakit").value = "";
      document.getElementById("noruang").value = "";
      document.getElementById("bpjs").value = "";
      document.getElementById("tglmasuk").value = "";
      document.getElementById("tglkeluar").value = "";

      document.getElementById("save").style.display = "block";
      document.getElementById("update").style.display = "none";
    }
  };
}
