{
    const menuList = document.querySelectorAll(".wep-menu-list-item");
    const placeholder = document.querySelectorAll(".wep-menu-item-placeholder");

    const menuItems = document.querySelectorAll(".wep-menu-item");

    menuList.forEach((listItem) => {
        listItem.addEventListener("click", (event) => {

            console.log(listItem);

            menuItems.forEach((menuItem) => {

                if (listItem.id == menuItem.id) {
                    menuItem.classList.remove("hide")
                }
                else {
                    menuItem.classList.add("hide")
                }

            })
        })
    })
}