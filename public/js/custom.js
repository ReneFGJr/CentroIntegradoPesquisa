function confirma() {
    if (!confirm('Confirma exclusão?')) {
        return (false)
    } else {
        return (true)
    }
}

function wclose() {
    windows.close()
}