let count_btns = 1

//Функция по созданию элемента, вызывается нажатием кнопки add_btn
function app_elem() {
  let res = prompt('Enter task', '');
  let appDiv = document.createElement('div');
  let dv_in1 = document.createElement('div');
  let dv_in2 = document.createElement('div');
  let dv_in3 = document.createElement('div');

  putDiv = document.querySelector('[class="second_back"]');
  putDiv.appendChild(appDiv);
  appDiv.setAttribute('class', 'elem_note');

  putElemP = document.querySelector('[class="elem_note"]:last-child');

  putElemP.appendChild(dv_in1);
  let text = document.createElement('h3');
  dv_in1.appendChild(text);
  text.setAttribute('class', 'txt_fnt');
  text.textContent = res;

  putElemP.appendChild(dv_in2);
  let check = document.createElement('input');
  dv_in2.appendChild(check);
  check.setAttribute('class', 'check_deal');
  check.setAttribute('type', 'checkbox');
  

  putElemP.appendChild(dv_in3);
  let btn = document.createElement('button');
  dv_in3.appendChild(btn);
  btn.setAttribute('class', 'delete_btn');
  btn.setAttribute('id', 'btn'+count_btns);
  btn.setAttribute('onclick', 'delete_task();');
  count_btns += 1;
}
//Удаление задания со страницы, вызывается нажатием кнопки delete_btn
function delete_task() {
  let id = event.target.id;
  let btn_id = document.getElementById(id);
  let par_for_btn = btn_id.parentElement;
  let par_for_div = par_for_btn.parentElement;
  par_for_div.remove();
}



{/* <div class="elem_note" id="elem_note">
      <div>
        <h3 class="txt_fnt" size="4.5px">Some text</h3>
      </div>
      <div>
        <input class="check_deal" type="checkbox"/>
      </div>
      <div id="div_btn">
        <button class="delete_btn" id='btn' onclick="delete_task(this);">
      </div>  */}