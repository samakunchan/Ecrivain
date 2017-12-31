var Form = {
    useConnection : {
        on: function () {
            document.getElementById("formConnection").style.display = "block";
            document.getElementById("formInscription").style.display = "none";
    },
        off : function () {
            document.getElementById("formConnection").style.display = "none";
        }

    },
    useInscription : {
        on: function () {
            document.getElementById("formInscription").style.display = "block";
            document.getElementById("formConnection").style.display = "none";
        },
        off : function () {
            document.getElementById("formInscription").style.display = "none";
        },

    }

}

var Admin = {
    useAdmin:{
        init: function () {
            document.getElementById("bord").style.display= "block";
            document.getElementById("bord").style.transition= "1s";
            document.getElementById("voir").style.display= "none";
            document.getElementById("post").style.display= "none";
            document.getElementById("edit").style.display= "none";
            document.getElementById("bio").style.display= "none";
        },
        activePost: function () {
            document.getElementById("bord").style.display= "none";
            document.getElementById("voir").style.display= "none";
            document.getElementById("post").style.display= "block";
            document.getElementById("post").style.transition= "1s";
            document.getElementById("edit").style.display= "none";
            document.getElementById("bio").style.display= "none";
        },
        activeView: function () {
            document.getElementById("bord").style.display= "none";
            document.getElementById("voir").style.display= "block";
            document.getElementById("voir").style.transition= "1s";
            document.getElementById("post").style.display= "none";
            document.getElementById("edit").style.display= "none";
            document.getElementById("bio").style.display= "none";
        },
        activeEdit: function () {
            document.getElementById("bord").style.display= "none";
            document.getElementById("voir").style.display= "none";
            document.getElementById("post").style.display= "none";
            document.getElementById("edit").style.display= "block";
            document.getElementById("edit").style.transition= "1s";
            document.getElementById("bio").style.display= "none";
        },
        activeBio:function () {
            document.getElementById("bord").style.display= "none";
            document.getElementById("voir").style.display= "none";
            document.getElementById("post").style.display= "none";
            document.getElementById("edit").style.display= "none";
            document.getElementById("bio").style.display= "block";
            document.getElementById("bio").style.transition= "1s";
        }
    }
}

