/* global StereoAudioRecorder */

var recorder; // globally accessible
var microphone;
var isEdge = navigator.userAgent.indexOf('Edge') !== -1 && (!!navigator.msSaveOrOpenBlob || !!navigator.msSaveBlob);
var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
var audio = document.querySelector('audio');
var btnStartRecording = document.getElementById('btn-start-recording');
var btnStopRecording = document.getElementById('btn-stop-recording');
btnStartRecording.onclick = captureMicrophone;
btnStopRecording.onclick = stopRecording;

function startRecording() {
    replaceAudio(undefined, true);
    audio.srcObject = microphone;
    var options = {
        type: 'audio',
        numberOfAudioChannels: isEdge ? 1 : 2,
        checkForInactiveTracks: true,
        bufferSize: 16384
    };
    if (isSafari || isEdge) {
        options.recorderType = StereoAudioRecorder;
    }
    if (navigator.platform && navigator.platform.toString().toLowerCase().indexOf('win') === -1) {
        options.sampleRate = 48000; // or 44100 or remove this line for default
    }
    if (isSafari) {
        options.sampleRate = 44100;
        options.bufferSize = 4096;
        options.numberOfAudioChannels = 2;
    }
    if (recorder) {
        recorder.destroy();
        recorder = null;
    }
    recorder = RecordRTC(microphone, options);
    recorder.startRecording();

    $('#recordTime').text('00:00');
    $(btnStartRecording).addClass('hidden');
    $(btnStopRecording).removeClass('hidden');
}
function stopRecording() {
    recorder.stopRecording(function () {
        replaceAudio(undefined, false);
        setTimeout(function () {
            $('#recordTime').text('00:00');
            $(btnStartRecording).removeClass('hidden');
            $(btnStopRecording).addClass('hidden');
            upload(recorder.blob);
        }, 100);
    });
}
function captureMicrophone() {
    if (microphone) {
        startRecording();
        return;
    }
    if (typeof navigator.mediaDevices === 'undefined' || !navigator.mediaDevices.getUserMedia) {
        alert('This browser does not supports WebRTC getUserMedia API.');
        if (!!navigator.getUserMedia) {
            alert('This browser seems supporting deprecated getUserMedia API.');
        }
        return;
    }
    navigator.mediaDevices.getUserMedia({
        audio: isEdge ? true : {echoCancellation: false}
    }).then(function (mic) {
        microphone = mic;
        startRecording();
    }).catch(function (error) {
        alert('Unable to capture your microphone. Please check console logs.');
        console.error(error);
    });
}
function replaceAudio(src, autoplay) {
    var newAudio = document.createElement('audio');
    newAudio.muted = true;
    newAudio.controls = false;
    newAudio.autoplay = autoplay;
    if (src) {
        newAudio.src = src;
    }
    newAudio.ontimeupdate = function () {
        var time = parseInt(newAudio.currentTime + .5);
        var min = parseInt(time / 60);
        var sec = time - min * 60;
        $('#recordTime').text((min < 10 ? '0' + min : min) + ':' + (sec < 10 ? '0' + sec : sec));
    };
    $('#audioTag').html(newAudio);
    audio = newAudio;
}
function getfilename(blob) {
    var fileType = blob.type.split('/')[0] || 'audio';
    var fileName = (Math.random() * 1000).toString().replace('.', '');
    if (fileType === 'audio') {
        fileName += '.' + (!!navigator.mozGetUserMedia ? 'ogg' : 'wav');
    } else {
        fileName += '.webm';
    }
    return fileName;
}

var player = null;
function recorderPlay(that, address) {
    if (typeof recorderPlay2 === 'function') {
        recorderPlay2();
    }
    $('#record-panel #items .item .fa-play').removeClass('hidden');
    $('#record-panel #items .item .fa-pause').addClass('hidden');
    $(that).parent().find('.fa-play').addClass('hidden');
    $(that).parent().find('.fa-pause').removeClass('hidden');
    if (player) {
        player.pause();
        player = null;
        player = new Audio(address);
    } else {
        player = new Audio(address);
    }
    player.onended = function () {
        $('#record-panel #items .item .fa-play').removeClass('hidden');
        $('#record-panel #items .item .fa-pause').addClass('hidden');
    };
    player.myaddress = address;
    player.play();
}
function recorderPause() {
    $('#record-panel #items .item .fa-play').removeClass('hidden');
    $('#record-panel #items .item .fa-pause').addClass('hidden');
    if (player) {
        player.pause();
    }
}
function recorderRemove(that, address) {
    $(that).parent().remove();
    if (player && player.myaddress === address) {
        player.pause();
    }
}
function upload(blob) {
    var fileName = getfilename(blob);
    var formData = new FormData();
    formData.append('file', blob, fileName);
    $('#upload-loading').removeClass('hidden');
    var url = $('#record-panel').data('href');
    $.ajax({
        url,
        data: formData,
        type: 'POST',
        dataType: 'json',
        contentType: false,
        processData: false,
        xhr: function () {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    //Do something with upload progress
                    console.log('Upload progress:', percentComplete);
                }
            }, false);
            return xhr;
        },
        success: function (result) {
            if (result.done) {
                var inp = $('#record-panel').data('input');
                $('#items').append(`<div class="item">
                    <input type="hidden" name="${inp}" value="${result.name}"/>
                    <a onclick="recorderPlay(this, '${result.address}')"><i class="fa fa-play"></i></a>
                    <a onclick="recorderPause()"><i class="fa fa-pause hidden"></i></a>
                    <span>فایل صوتی</span>
                    <a onclick="recorderRemove(this, '${result.address}')"><i class="fa fa-times"></i></a>
                </div>`);
            } else {
                alert('خطا در بارگزاری صدا!');
            }
        },
        complete: function () {
            $('#upload-loading').addClass('hidden');
        }
    });
}

$(function () {


});