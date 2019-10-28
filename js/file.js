var modal = document.getElementById("modal");
var output = document.querySelector(".output");
modal.style.display = "none";
(function(window) {
  function triggerCallback(e, callback) {
    if (!callback || typeof callback !== "function") {
      return;
    }
    var files;
    if (e.dataTransfer) {
      files = e.dataTransfer.files;
    } else if (e.target) {
      files = e.target.files;
    }
    callback.call(null, files);
  }
  function makeDroppable(ele, callback) {
    var input = document.createElement("input");
    input.setAttribute("type", "file");
    input.setAttribute("multiple", true);
    input.style.display = "none";
    input.addEventListener("change", function(e) {
      triggerCallback(e, callback);
    });
    ele.appendChild(input);

    ele.addEventListener("dragover", function(e) {
      e.preventDefault();
      e.stopPropagation();
      ele.classList.add("dragover");
    });

    ele.addEventListener("dragleave", function(e) {
      e.preventDefault();
      e.stopPropagation();
      ele.classList.remove("dragover");
    });

    ele.addEventListener("drop", function(e) {
      e.preventDefault();
      e.stopPropagation();
      ele.classList.remove("dragover");
      triggerCallback(e, callback);
    });

    ele.addEventListener("click", function() {
      input.value = null;
      if (clickEnabled) input.click();
    });
  }
  window.makeDroppable = makeDroppable;
})(this);
(function(window) {
  makeDroppable(window.document.querySelector(".demo-droppable"), function(
    files
  ) {
    console.log(files);
    output.innerHTML = "";
    for (var i = 0; i < files.length; i++) {
      if (files[i].type.indexOf("image/") === 0) {
        output.innerHTML +=
          '<img width="200" src="' + URL.createObjectURL(files[i]) + '" />';
      }
      output.innerHTML += "<p>" + files[i].name + "</p>";
    }

    uploadRe(putRe(files[0]));
  });
})(this);
function putRe(file) {
  return file;
}

function copyText() {
  var copyText = $(".code");
  copyText.select();
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}

function showCode(data) {
  $.get(
    "./includes/components/short-api.php?url=" +
      encodeURI(data.data.link) +
      "&keyword=" +
      data.data.name,

    function(data, status) {
      console.log("Data: " + data.shorturl + "\nStatus: " + status);
      if (status == "success") {
        $.post(
          "includes/api.php",
          {
            url: data.shorturl
          },
          function(data, status) {
            console.log("Data: " + data + "\nStatus: " + status);
            if (status == "success") {
              $("#content").hide();
              $(".code").text(data);
              modal.style.display = "none";
            }
          }
        );
      }
    }
  );
}

function uploadRe($files) {
  console.log($files);
  // Begin file upload
  console.log("Uploading file to put.re..");

  // API Endpoint
  var apiUrl = "https://api.put.re/upload";

  var settings = {
    async: false,
    crossDomain: true,
    processData: false,
    contentType: false,
    type: "POST",
    url: apiUrl,
    mimeType: "multipart/form-data"
  };

  var formData = new FormData();
  formData.append("image", $files);
  settings.data = formData;

  modal.style.display = "block";

  $.ajax(settings).done(function(response) {
    var data = JSON.parse(response);
    //data.data.link = "https://iq.now.sh/s/" + data.data.name;
    console.log(data);
    showCode(data);
  });
  $(".demo-droppable").hide();
}
