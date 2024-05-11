using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class InstructionsScreenReader : MonoBehaviour
{
    public AudioSource SoundPlayer;

    // Start is called before the first frame update
    void Start()
    {
        SoundPlayer.Play();
    }
}
