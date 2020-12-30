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