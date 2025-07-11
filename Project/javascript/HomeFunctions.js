let easyButton = document.getElementById("easyButton");
let hardButton = document.getElementById("hardButton");
let easyLeader = document.getElementsByClassName("easyLeader")[0];
let hardLeader = document.getElementsByClassName("hardLeader")[0];

easyButton.onclick = function () {
  easyButton.classList.add("active");
  hardButton.classList.remove("active");
  easyLeader.style.display = "contents";
  hardLeader.style.display = "none";
};

hardButton.onclick = function () {
  hardButton.classList.add("active");
  easyButton.classList.remove("active");
  hardLeader.style.display = "contents";
  easyLeader.style.display = "none";
};

let EasyStatButton = document.getElementById("EasyStatButton");
let HardStatButton = document.getElementById("HardStatButton");
let EasyStat = document.getElementsByClassName("EasyStat")[0];
let HardStat = document.getElementsByClassName("HardStat")[0];

EasyStatButton.onclick = function () {
  EasyStatButton.classList.add("active");
  HardStatButton.classList.remove("active");
  HardStat.style.display = "none";
  EasyStat.style.display = "contents";
};

HardStatButton.onclick = function () {
  HardStatButton.classList.add("active");
  EasyStatButton.classList.remove("active");
  EasyStat.style.display = "none";
  HardStat.style.display = "contents";
};
