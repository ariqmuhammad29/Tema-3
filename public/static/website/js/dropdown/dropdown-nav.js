
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownList = document.getElementById('dropdownList')

        dropdownButton.addEventListener('click', () => {
            if (dropdownList.classList.contains('hidden')) {
                dropdownList.classList.remove('hidden')
            } else {
                dropdownList.classList.add('hidden')
            }
        })

        document.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownList.contains(event.target)) {
                dropdownList.classList.add('hidden');
            }
        });
    