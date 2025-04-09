export function checksubmit(e, alert) {
    const input = document.getElementsByTagName("input");
    let valid = true;
    for (let i = 0; i < input.length; i++) {
        if (input[i].type != "password") {
            if (input[i].value.trim() == '') {
                valid = false;
                break;
            }
        } else {
            if (input[i].value.length == 0) {
                valid = false;
                break;
            }
        }
    }
    for (let i = 0; i < alert.length; i++) {
        if (alert[i].style.display == "block") {
            valid = false;
            break;
        }
    }
    if (!valid) {
        e.preventDefault();
    }
}