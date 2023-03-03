/* popover */
let mbPops = document.querySelectorAll('[data-mb="pop"]')
if(mbPops) {
    mbPops.forEach((pop) => {
        pop.addEventListener('mouseover',() => {
            let newPop = mbPopCreate(pop)
            pop.append(newPop)
        })
        pop.addEventListener('mouseout',() => {
            document.querySelector('.mbPop').remove()
        })
    })

    function mbPopCreate(item) {
        if(item) {
            let popTitle = item.getAttribute('data-mb-title')
            let popContent = item.getAttribute('data-mb-content')
            let newPop =  document.createElement('div')
            newPop.setAttribute('class','mbPop')
            newPop.innerHTML = `
        <div class="mb-header">${popTitle}</div>
        <div class="mb-body">${popContent}</div>
        `
            return newPop
        } else {return false}
    }
}

const themes = [
    [
        'nano',
        {
            swatches: [
                'rgba(244, 67, 54, 1)',
                'rgba(233, 30, 99, 0.95)',
                'rgba(156, 39, 176, 0.9)',
                'rgba(103, 58, 183, 0.85)',
                'rgba(63, 81, 181, 0.8)',
                'rgba(33, 150, 243, 0.75)',
                'rgba(3, 169, 244, 0.7)'
            ],

            defaultRepresentation: 'RGBA',
            components: {
                preview: true,
                opacity: true,
                hue: true,

                interaction: {
                    hex: false,
                    rgba: false,
                    hsva: false,
                    input: true,
                    clear: false,
                    save: true
                }
            }
        }
    ]
];

const pickrContainers = document.querySelectorAll('.form-color-box');
let pCount = 4 + pickrContainers.length

pickrContainers.forEach((pickrContainer) => {
    let pickr = null;
    pCount--
    pickrContainer.style.zIndex = pCount
    for (const [theme, config] of themes) {
        const el = document.createElement('p');
        pickrContainer.appendChild(el);
        let formInput = pickrContainer.getAttribute('data-input')
        formInput = document.querySelector('#'+ formInput)
        let formInputValue = formInput.value
        if(formInputValue == '') {
            formInputValue = '#000000'
        }

        // Delete previous instance
        if (pickr) {
            pickr.destroyAndRemove();
        }

        // Create fresh instance
        pickr = new Pickr(Object.assign({
            el, theme,
            container: pickrContainer,
            default: formInputValue
        }, config));

        // Set events
        pickr.on('save', (color, instance) => {
            newColor = pickr.getColor().toRGBA().toString(0);

            formInput.value = newColor;
            pickr.hide();
        }).on('changestop', (source, instance) => {});
    }
})

const searchInput = document.querySelector('.menuSearchField');
const searchCancelButton = document.querySelector('.menuSearchCancelButton');
searchInput.addEventListener('keyup',() => {
    let sidebarItems = document.querySelectorAll('.sideBarNav > .item');
    let searchInputValue = searchInput.value.toUpperCase()
    let searchListTotal = 0

    sidebarItems.forEach((sidebarItem) => {
        let sideBarSubItems = sidebarItem.querySelectorAll('.subMenuItem')
        let sideBarSubMenu = sidebarItem.querySelector('.subMenu')
        sidebarItem.style.display = 'none'
        if(sideBarSubMenu) {
            let searchListCount = 0
            if(searchInputValue.length > 0) {
                searchCancelButton.style.display = "inline-flex"
                sideBarSubItems.forEach((sideBarSubItem) => {
                    sideBarSubItem.style.display = 'none'
                    if(sideBarSubItem.querySelector('a').innerHTML.toUpperCase().indexOf(searchInputValue) > -1){
                        searchListCount++
                        sideBarSubItem.style.display = 'block'
                    }
                })
                if(searchListCount > 0) {
                    sidebarItem.style.display = 'block'
                    sideBarSubMenu.classList.add('show')
                } else {
                    sideBarSubMenu.classList.remove('show')
                }
                searchListTotal += searchListCount
            } else {
                sidebarItem.style.display = 'block'
                sideBarSubMenu.classList.remove('show')
                searchCancelButton.style.display = "none"
                sideBarSubItems.forEach((sideBarSubItem) => {sideBarSubItem.style.display = 'block'})
            }
        } else if(searchInputValue.length == 0) {sidebarItem.style.display = 'block'}
        if(searchListTotal > 0) {
            document.querySelector('.searchNoResult').classList.remove('show')
        } else {
            document.querySelector('.searchNoResult').classList.add('show')
        }
    })
})

searchCancelButton.addEventListener('click',() => {
    searchInput.value = ''
    searchInput.dispatchEvent(new Event('keyup'))
})

/* responsive settings */

let screenWidth = window.innerWidth

if(screenWidth < 1199) {
    let sideBar = document.querySelector('.sideBarCol')
    let sideBarArea = sideBar.querySelector('.sidebarArea')
    let pageInner = document.querySelector('.pageInnerArea')
    let wpBarHeight = document.querySelector('#wpadminbar').offsetHeight
    let wpsidebarWidth = document.querySelector('#adminmenuwrap').offsetWidth
    let innerHeight = window.innerHeight - wpBarHeight

    sideBar.classList.remove('col-3')
    sideBarArea.style.height = innerHeight +"px"
    sideBarArea.querySelector('.sidebar').style.height = innerHeight +"px"
    pageInner.classList.remove('col-9')
    pageInner.classList.add('col-12')

    let navButton = document.createElement('div')
    navButton.setAttribute('class','mobilNavArea')
    navButton.innerHTML = `<a href="javascript:;" class="mobilNavButton"><i class="fa-solid fa-bars"></i></a><div class="mobilNavTitle">WP Magic Box</div>`

    let wpBodyContent = document.querySelector('#screen-meta')
    let parentWPBodyContent = wpBodyContent.parentNode

    parentWPBodyContent.insertBefore(navButton,wpBodyContent)

    navButton.addEventListener('click',() => {
        sideBarArea.classList.remove('close')
        sideBarArea.classList.add('open')
        sideBarArea.style.visibility = "visible"
        sideBarArea.style.top = wpBarHeight +"px"
        sideBarArea.style.left = wpsidebarWidth +"px"
    })

    let mobilNavHideButton = document.querySelector('.mobilNavHideButton')
    mobilNavHideButton.addEventListener('click',() => {
        sideBarArea.classList.remove('open')
        sideBarArea.classList.add('close')
        setTimeout(() => {
            sideBar.querySelector('.sidebarArea').style.visibility = "hidden"
        },600)
    })
}

/* modal
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
}) */