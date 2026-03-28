const pricePerCopy ={
    blyszczacy: 1.5,
    matowy: 2
}

function dodaj(){
    const fileInput = document.getElementById('obraz')
    const selectedFile = fileInput.files[0]

    if(!selectedFile){
        alert('Wybierz plik z listy obrazów.')
        return
    }

    const copiesInput = document.getElementById('kopie')
    const copies = Number(copiesInput.value)

    if(!copies || copies < 1){
        alert('Podaj liczbę kopii')
        copiesInput.focus()
        return
    }

    const paperOption = document.querySelector('input[name="papier"]:checked')
    const paperType = paperOption ? paperOption.value : 'blyszczacy'
    const unitPrice = pricePerCopy[paperType] ?? pricePerCopy.blyszczacy
    const totalPrice = (copies * unitPrice)	
    const cart = document.querySelector('#right .koszyk')
    const position = document.createElement('article')
    position.className = 'pozycja'

    const preview = document.createElement('img')
    const previewUrl = URL.createObjectURL(selectedFile)
    preview.src = previewUrl
    preview.alt = selectedFile.name
    preview.onload = () => URL.revokeObjectURL(previewUrl)

    const copiesInfo = document.createElement('p')
    copiesInfo.textContent = `Liczba kopii: ${copies}`

    const priceInfo = document.createElement('p')
    priceInfo.textContent = `Cena: ${totalPrice}`

    position.appendChild(preview)
    position.appendChild(copiesInfo)
    position.appendChild(priceInfo)
    cart.appendChild(position)
}