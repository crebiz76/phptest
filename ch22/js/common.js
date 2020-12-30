function login_check(){
    if(!document.login_form.id.value)
    {
        alert("아이디를 입력하세요");
        document.login_form.id.focus();
        return;
    }
    
    if(!document.login_form.pass.value)
    {
        alert("비밀번호를 입력하세요");
        document.login_form.pass.focus();
        return;
    }
    document.login_form.submit();
}

function activateArticle(clicked_id){
    
    document.querySelector('.login_form').classList.remove('active');
    document.querySelector('.join_form').classList.remove('active');
    if(clicked_id == 1)
    {
        document.querySelector('.login_form').classList.add('active');
    }
    else if(clicked_id == 2)
    {
        document.querySelector('.join_form').classList.add('active');
    }
    else
    {
        // No action
    }
}

function check_id()
{
    window.open("check_id.php?id="+document.member_form.id.value, "IDcheck",
    "left=200, top=200, width=200, height=60, scrollbars=no, resizable=yes");
}

function check_nick()
{
    window.open("check_nick.php?nick="+document.member_form.nick.value, "NICKcheck",
    "left=200, top=200, width=200, height=60, scrollbars=no, resizable=yes");
}

function check_input()
{
    if(!document.member_form.hp2.value || !document.member_form.hp3.value)
    {
        alert("휴대폰 번호를 입력하세요.");
        document.member_form.nick.focus();
        return;
    }

    if(document.member_form.pass.value != document.member_form.pass_confirm.value)
    {
        alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요.");
        document.member_form.pass.focus();
        document.member_form.pass.select();
        return;
    }

    document.member_form.submit();
}

function reset_form()
{
    document.member_form.id.value = "";
    document.member_form.pass.value = "";
    document.member_form.pass_confirm.value = "";
    document.member_form.name.value = "";
    document.member_form.nick.value = "";
    document.member_form.hp2.value = "";
    document.member_form.hp3.value = "";
    document.member_form.email1.value = "";
    document.member_form.email2.value = "";

    document.member_form.id.focus();
    return;
}