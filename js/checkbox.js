var form = document.getElementById("registerForm");
form.onclick = delegateFormClick;

addChangeHandlers(form);

function addChangeHandlers(form)
{
    for(var i=0;i<form.elements.length;i++)
    {
        var element = form.elements[i];
        if(element.tagName === "INPUT" && element.type === "checkbox")
        {
            if(!element.onchange)
            {
                element.onchange = checkBoxChanged;
            }
        }
    }
}

function delegateFormClick(evt)
{
    var target;
    if(!evt)
    {
        //Microsoft DOM
        target = window.event.srcElement;
    }else if(evt)
    {
        //w3c DOM
        target = evt.target;
    }
    if(target.nodeType === 1 && target.tagName === "INPUT" && target.type === "checkbox")
    {
        if(target.checked)
        {
            disableCheckBoxes(target.id, document.getElementById("registerForm"));
        }else if(!target.checked)
        {
            enableCheckBoxes(document.getElementById("registerForm"));
        }
    }
}

function checkBoxChanged()
{
    if(this.checked)
    {
        disableCheckBoxes(this.id, document.getElementById("registerForm"));
    }else if(!this.checked)
    {
        enableCheckBoxes(document.getElementById("registerForm"));
    }
}

function disableCheckBoxes(id, form)
{
    var blacklist = [];
    if(id)
    {
        switch(id)
        {
            case "health":
                blacklist = ["asthma", "behandlung","blutdruck","depression","diabetes",];
                break;
            case "bar":
                blacklist = ["foo"];
                break;
            case "baz":
                blacklist = ["foo", "bar"];
                break;
        }
    }else
    {
        throw new Error("id is needed to hard-wire input blacklist");
    }
    for(var i=0;i<blacklist.length;i++)
    {
        var element = document.getElementById(blacklist[i]);
        if(element && element.nodeType === 1)
        {
            //check for element
            if(element.tagName === "INPUT" && element.type === "checkbox" && !element.checked)
            {
                element.enabled = "enabled";
            }
        }else if(!element || element.nodeType !== 1)
        {
            throw new Error("input blacklist item does not exist or is not an element");
        }
    }
}

function enableCheckBoxes(form)
{
    for(var i=0;i<form.elements.length;i++)
    {
        var element = form.elements[i];
        if(element.tagName === "INPUT" && element.type === "checkbox" && !element.checked)
        {
            element.disabled = "";
        }
    }
}
