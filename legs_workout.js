'use strict';

var workoutId = ['workoutResults1', 'workoutResults2', 'workoutResults3', 'workoutResults4', 'workoutResults5', 'workoutResults6'];
var resultsPage = [];
var user = {
  name : '', age : '',level : '', length : '', type : '', goal : '', equipment : ''
};


function createWorkoutPage() {
  localStorage.removeItem('userData');
  localStorage.removeItem('workoutData');
  //resultsPage = JSON.parse(localStorage.getItem('workoutData'));
  resultsPage = [{'name': 'AIR SQUAT', 'img': 'https://www.youtube.com/embed/gG2Z1siSvkk', 'descr': 'test'}, 
                 {'name': 'STRAIGHT LEG BOUNDS', 'img': 'https://www.youtube.com/embed/gG2Z1siSvkk', 'descr': 'test'},
                 {'name': 'FORWARD LUNGE', 'img': 'https://www.youtube.com/embed/gG2Z1siSvkk', 'descr': 'test'},
                 {'name': 'DONKEY KICKS', 'img': 'https://www.youtube.com/embed/gG2Z1siSvkk', 'descr': 'test'},
                 {'name': 'GLUTE BRIDGE', 'img': 'https://www.youtube.com/embed/gG2Z1siSvkk', 'descr': 'test'},
                 {'name': 'JUMP SQUAT', 'img': 'https://www.youtube.com/embed/gG2Z1siSvkk', 'descr': 'test'},]
  bringName();
  for(var i = 0; i < resultsPage.length; i++){

    var workoutContainer = document.getElementById('workoutResults');
    var vidContainer = document.createElement('div');
    vidContainer.setAttribute('class', 'workoutFrame');
    vidContainer.setAttribute('id', workoutId[i]);
    var video = document.createElement('iframe');
    video.setAttribute('class', 'iframeSizing');
    video.src = resultsPage[i].img;
    workoutContainer.appendChild(vidContainer);
    vidContainer.appendChild(video);
  }
  for(var i = 0; i < resultsPage.length; i++){
    var workoutContainer = document.getElementById(workoutId[i]);
    var exerciseTitle = document.createElement('p');
    exerciseTitle.setAttribute('class', 'extitle');
    exerciseTitle.innerHTML = resultsPage[i].name;
    workoutContainer.appendChild(exerciseTitle);
    var iframeDesc = document.createElement('p');
    iframeDesc.setAttribute('class', 'description');
    iframeDesc.innerHTML = resultsPage[i].descr;
    workoutContainer.appendChild(iframeDesc);
  }
  for(var i = 0; i < resultsPage.length; i++){
    var outlineBox = document.getElementById('resultsTitle');
    var outline = document.createElement('div');
    outline.setAttribute('id', 'exerciseList');
    if (resultsPage[i].name !== 'Plank' || resultsPage[i].name !== 'Crab Walk' || resultsPage[i].name !== '3 Point Plank') {
      outline.innerHTML = resultsPage[i].name + ' for 8-12 reps';
      outlineBox.appendChild(outline);
    }else {
      outline.innerHTML = resultsPage[i].name + ' for 30 to 60 secs';
      outlineBox.appendChild(outline);
    }
  }
};


function bringName() {
  var getName = document.getElementById('showName');
  var appendName = document.createElement('p');
  if (user){
    appendName.innerText = 'Hey ' + user.name + ', let\'s get this workout started!';
  }else {
    appendName.innerText = 'Hey Bro, let\'s get this workout started!';
  }
  getName.appendChild(appendName);
};
