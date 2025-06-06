$numbersapiUrl = "http://numbersapi.com"

function Show-Date_Info {
    Write-Host "Ñåãîäíÿ: " (Get-Date).ToString("dd.MM.yyyy") -ForegroundColor Cyan

    $date = Get-Date

    Invoke-RestMethod ("$numbersapiUrl/" + $date.Day)
    Invoke-RestMethod ("$numbersapiUrl/" + $date.Month)
    Invoke-RestMethod ("$numbersapiUrl/" + $date.Year)
}

Show-Date_Info