using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class GameStart : MonoBehaviour
{
    public string NameOfLevel;
    public static int RememberGraphicsOption;
    public static int TotalPoints = 0; 
    public static int Difficulty = 1;

    // This function will call the Loadlevel function after waiting 1 second
    public void DelayedLoad()
    {
        //counter++;
        Debug.Log("SWITCHING SCREENS");
        Debug.Log("HUH HUH HUH" + AudioListener.volume);
        StartCoroutine(LoadLevel());
    }

    // This function is in charge of switching scenes
    IEnumerator LoadLevel()
    {
        yield return new WaitForSeconds(1);

        SceneManager.LoadScene(NameOfLevel);
    }
}