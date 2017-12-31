
var admin = Object.create(Admin);
admin.useAdmin.init();
document.getElementById("postB").addEventListener("click", admin.useAdmin.activePost);
document.getElementById("viewB").addEventListener("click", admin.useAdmin.activeView);
document.getElementById("editB").addEventListener("click", admin.useAdmin.activeEdit);
document.getElementById("bioB").addEventListener("click", admin.useAdmin.activeBio);
