const hamburger = document.getElementById('hamburger');
const hamburgerBars = hamburger.querySelectorAll('.hamburgerBar')
const navMenu = document.getElementById('navMenuMT')


function openHamburger(){
    if(window.innerWidth > 1000){
        return
    }
    navMenu.classList.add('active');
    hamburgerBars.forEach(bar => {
        bar.classList.add('change');
    });
}
function closeHamburger(){
    navMenu.classList.remove('active');
    hamburgerBars.forEach(bar => {
        bar.classList.remove('change');
    });
}

const tx = document.getElementsByTagName("textarea");
for (let i = 0; i < tx.length; i++) {
    tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;");
    tx[i].addEventListener("input", OnInput, false);
}

function OnInput() {
    this.style.height = 0;
    this.style.height = (this.scrollHeight) + "px";
}
document.getElementsByTagName("textarea")[0].dispatchEvent(new Event('input', { bubbles: true }));

var taarten = document.getElementById('taarten');
var cupcakes = document.getElementById('cupcakesCakepops');
var taartenHeight = taarten.clientHeight;
var cupcakesHeight = cupcakes.clientHeight;
var taartenChildren = taarten.childNodes;
var cupcakesChildren = cupcakes.childNodes;

function getHeightPreviewChildren(children){
    childrenOneSide = []
    childElements = []
    for (let i = 0; i < children.length; i++) {
        if(children[i]['nodeType'] !== 3){
          childElements.push(children[i])
          if(window.innerWidth > 576){
            if(children[i]['id'].includes('taartL') || children[i]['id'].includes('cupcakesR')){
                childrenOneSide.push(children[i]);
            }
          }
        }
    }
    var j = 0
    if(window.innerWidth <= 576){
        j = 6
    }else{
        j = 3
        childElements = childrenOneSide
    }
    var heightPreviewChildren = 0
    for (let i = 0; i < j; i++) {
        heightPreviewChildren += childElements[i].clientHeight;
    }
    if(!window.innerWidth <= 576){
        var heightChildren = 0
        for (let k = 0; k < childElements.length; k++) {
            heightChildren += childElements[k].clientHeight;
        }
        heightChildren = heightChildren + 127 + 12
        if(children[1].parentElement.id == "taarten"){
            taartenHeight = heightChildren + (24 * 25);
        }else{
            cupcakesHeight = heightChildren + (17 * 25);
        }
    }
    return heightPreviewChildren;
}
var taartenPreviewHeight
var cupcakesPreviewHeight
window.onload = function() { setHeightsPreview() }
window.onresize = function() { setHeightsPreview() };
function setHeightsPreview(){
    taartenPreviewHeightElements = getHeightPreviewChildren(taartenChildren)
    taartenPreviewHeight = taartenPreviewHeightElements + (taartenPreviewHeightElements/7) + 100
    if(taarten.classList.contains('showMore')){
        taarten.style.maxHeight = taartenHeight + "px";
    }else{
        taarten.style.maxHeight = taartenPreviewHeight + "px";
    }

    cupcakesPreviewHeightElements = getHeightPreviewChildren(cupcakesChildren);
    cupcakesPreviewHeight = cupcakesPreviewHeightElements + (cupcakesPreviewHeightElements/7);
    if(cupcakes.classList.contains('showMore')){
        cupcakes.style.maxHeight = cupcakesHeight + "px";
    }else{
        cupcakes.style.maxHeight = cupcakesPreviewHeight + "px";
    }
}


function seeMore(element, height){
    element.style.maxHeight = height + "px";
    element.classList.add('showMore');
    seeMoreButton = element.getElementsByTagName('button')[1]
    setTimeout(function () {
        seeMoreButton.innerHTML = "Zie minder";
        if(element.id == "taarten"){
            seeMoreButton.onclick = function() { seeLess(this.parentElement, taartenPreviewHeight) }
        }else{
            seeMoreButton.onclick = function() { seeLess(this.parentElement, cupcakesPreviewHeight) }
        }
    }, 1500)
}

function seeLess(element, height){
    element.style.maxHeight = height + "px";
    element.classList.remove('showMore');
    seeMoreButton = element.getElementsByTagName('button')[1]
    setTimeout(function () {
        seeMoreButton.innerHTML = "Zie meer";
        if(element.id == "taarten"){
            seeMoreButton.onclick = function() { seeMore(this.parentElement, taartenHeight) }
        }else{
            seeMoreButton.onclick = function() { seeMore(this.parentElement, cupcakesHeight) }
        }
    }, 1500)
}