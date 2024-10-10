// ask = select
        // asklist = menu

        const dropdown = document.querySelectorAll('.dropdown')

        dropdown.forEach(dropdown => {
            const select = dropdown.querySelector('.ask')
            const menu = dropdown.querySelector('.asklist')
            const button = dropdown.querySelector('.pencet')
            const buttonNormal = dropdown.querySelector('.button-normal')
            const buttonWhite = dropdown.querySelector('.button-white')

            select.addEventListener('click', () => {
                if (menu.classList.contains('hidden')) {
                    menu.classList.remove('hidden')
                    button.classList.add('bg-[#6366F1]')
                    button.classList.remove('bg-gray-100')
                    buttonWhite.classList.remove('hidden')
                    buttonNormal.classList.add('hidden')
                    


                } else {
                    menu.classList.add('hidden')
                    button.classList.remove('bg-[#6366F1]')
                    button.classList.add('bg-gray-100')
                    buttonWhite.classList.add('hidden')
                    buttonNormal.classList.remove('hidden')
                }
            })

            document.addEventListener('click', (event) => {
                if (!select.contains(event.target) && !menu.contains(event.target)) {
                    menu.classList.add('hidden')
                    button.classList.remove('bg-[#6366F1]')
                    button.classList.add('bg-gray-100')
                    buttonWhite.classList.add('hidden')
                    buttonNormal.classList.remove('hidden') 
                }
            });

        })