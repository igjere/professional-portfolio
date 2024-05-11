using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class SettingsAccess : MonoBehaviour
{
    private bool isOptionsMenuLoaded = false;

    public void GoToSettingsScene()
    {
        if (!isOptionsMenuLoaded)
        {
            SceneManager.LoadScene("Options Menu", LoadSceneMode.Additive);
            isOptionsMenuLoaded = true;
        }
    }

    public void BackToScene()
    {
        SceneManager.UnloadSceneAsync("Options Menu");
    }
}
