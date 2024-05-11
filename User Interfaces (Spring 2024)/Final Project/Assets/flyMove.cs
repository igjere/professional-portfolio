using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class flyMove : MonoBehaviour
{
    public LevelManager levelMan;
    public float moveSpeed = 5f;
    public float directionChangeInterval = 1f;
    private Rigidbody2D rb;
    private Vector2 movement;

    public AudioSource SoundPlayer;
    bool MouseOn = false;

    public AudioSource KillSound;

    void Start()
    {
        rb = GetComponent<Rigidbody2D>();
        rb.gravityScale = 0;
        StartCoroutine(ChangeDirectionRoutine());
    }

    IEnumerator ChangeDirectionRoutine()
    {
        while (true)
        {
            ChangeDirection();
            yield return new WaitForSeconds(directionChangeInterval);
        }
    }

    private void ChangeDirection()
    {
        float angle = Random.Range(0, 360) * Mathf.Deg2Rad;
        movement = new Vector2(Mathf.Cos(angle), Mathf.Sin(angle));

        float speed = Random.Range(moveSpeed * 0.5f, moveSpeed * 1.5f);
        rb.velocity = movement * speed;
        RotateInMovementDirection();
    }

    void Update()
    {
        if (Vector3.Distance(transform.position, Vector3.zero) > 10f)
        {
            Vector3 directionToCenter = (Vector3.zero - transform.position).normalized;
            rb.velocity = Vector3.Lerp(rb.velocity, directionToCenter * moveSpeed, Time.deltaTime);
        }
    }

    private void RotateInMovementDirection()
    {
        if (movement != Vector2.zero) 
        {
            float angle = Mathf.Atan2(movement.y, movement.x) * Mathf.Rad2Deg;
            angle += 65; // Rotate to face bottom right
            rb.transform.rotation = Quaternion.AngleAxis(angle, Vector3.forward);
        }
    }

    private void OnMouseOver()
    {
        if (MouseOn == false)
        {
            if (MainScript.ScreenReaderEnabled == true)
                SoundPlayer.Play();
            MouseOn = true;
        }
        Debug.Log(MouseOn);
    }

    private void OnMouseExit()
    {
        MouseOn = false;
        Debug.Log(MouseOn);
    }

    private void OnMouseDown()
    {
        StartCoroutine(KillBug());
    }

    private IEnumerator KillBug()
    {
        KillSound.Play();
        yield return new WaitForSeconds(0.3F);
        levelMan.FlyClicked();  
        gameObject.SetActive(false);
        Destroy(this.gameObject);  
    }
}
