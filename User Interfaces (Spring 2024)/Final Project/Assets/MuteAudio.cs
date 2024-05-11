using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class MuteAudio : MonoBehaviour
{
    public GameObject Toggler;

    void Start()
    {
        if (AudioListener.volume == 1)
        {
            Toggler.GetComponent<Toggle>().isOn = false;
        }

        if (AudioListener.volume == 0)
        {
            Toggler.GetComponent<Toggle>().isOn = true;
        }
    }

    // Start is called before the first frame update
    public void MuteToggle(bool muted)
    {
        if (muted)
        {
            AudioListener.volume = 0;
        }
        else
        {
            AudioListener.volume = 1;
        }
        
    }
}
