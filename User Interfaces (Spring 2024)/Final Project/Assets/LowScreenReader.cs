using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.EventSystems;

public class LowScreenReader : MonoBehaviour, IPointerEnterHandler, IPointerExitHandler
{
    public AudioSource SoundPlayer;

    public void OnPointerEnter(PointerEventData eventData)
    {
        if (MainScript.ScreenReaderEnabled == true)
            SoundPlayer.Play();
        Debug.Log("Mouse on Low");
    }

    public void OnPointerExit(PointerEventData eventData)
    {
        Debug.Log("nah");
    }
}