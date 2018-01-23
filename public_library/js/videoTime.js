/**
 * Created by Recreational on 1/21/2017.
 */
//The video time object
function VideoTime(totalSeconds){
    var seconds = Math.floor(totalSeconds);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);

    //Return the current seconds modded
    this.getCurrentSeconds = function(){
        return modulus(seconds, 60);
    }

    //Return the current minutes modded
    this.getCurrentMinutes = function(){
        return modulus(minutes, 60);
    }

    //Return the current minutes modded
    this.getCurrentHours = function(){
        return modulus(hours, 24);
    }

    //Override the toString method
    this.toString = function(){
        return (this.getCurrentHours() > -1 ? this.getCurrentHours() : "") + ":" +
            (this.getCurrentMinutes() < 10 ?  "0" : "") + (this.getCurrentMinutes()) +
            ":" + (this.getCurrentSeconds() < 10 ?  "0" : "") + (this.getCurrentSeconds());
    }
}