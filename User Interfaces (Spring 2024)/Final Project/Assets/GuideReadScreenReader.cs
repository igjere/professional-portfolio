using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class GuideReadScreenReader : MonoBehaviour
{
    public AudioSource SoundPlayer;

    // Start is called before the first frame update
    void Start()
    {
        if (MainScript.ScreenReaderEnabled == true)
            SoundPlayer.Play();
    }
}
