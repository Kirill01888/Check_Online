function load_from_db_tasks(array_tasks) {
  for (let i = 0; i < array_tasks.length; i++) {
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
    text.textContent = array_tasks[i]['task_text'];

    putElemP.appendChild(dv_in2);
    let check = document.createElement('input');
    dv_in2.appendChild(check);
    check.setAttribute('class', 'check_deal');
    check.setAttribute('type', 'checkbox');
    //Не работает пока что
    if (array_tasks[i]['checked'] == 'true') {
      check.setAttribute('checked', 'true');
    }
    putElemP.appendChild(dv_in3);
    let btn = document.createElement('button');
    dv_in3.appendChild(btn);
    btn.setAttribute('class', 'delete_btn');
    btn.setAttribute('id', 'btn' + count_btns);
    btn.setAttribute('onclick', 'delete_task();');
    count_btns += 1;
  }
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
