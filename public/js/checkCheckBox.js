// let Checked = null;
// for(let Checked of document.getElementById('custom-checkbox')){
//     Checked.onclick = function()
//     {
//         if(Checked != null)
//         {
//             Checked.checked = false;
//             Checked = Checked;
//         }
//         Checked = Checked;
//     }
// }

let Checked = null;
//The class name can vary
for (let CheckBox of document.getElementsByClassName('custom-checkbox')){
	CheckBox.onclick = function(){
  	if(Checked!=null){
      Checked.checked = false;
      Checked = CheckBox;
    }
    Checked = CheckBox;
  }
}